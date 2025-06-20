/routes/paymentRoutes.js

const express = require("express");
const { createOrder, verifyPayment } = require("../controllers/paymentController");

const router = express.Router();

router.post("/create-order", createOrder);
router.post("/verify-payment", verifyPayment);

module.exports = router;


controllers/paymentController.js

const Razorpay = require("razorpay");
const crypto = require("crypto");
const { razorpayKeyId, razorpayKeySecret } = require("../config/config");

const razorpay = new Razorpay({
    key_id: razorpayKeyId,
    key_secret: razorpayKeySecret,
});

// 🟢 CREATE ORDER API
exports.createOrder = async (req, res) => {
    const { amount, currency } = req.body;

    try {
        const options = {
            amount: amount * 100, // Convert to paise
            currency,
            receipt: `receipt_${Date.now()}`,
        };

        const order = await razorpay.orders.create(options);
        console.log("✅ Order Created:", order);

        res.status(200).json({ success: true, orderId: order.id, amount });
    } catch (error) {
        console.error("❌ Razorpay Error:", error);
        res.status(500).json({ success: false, error: error.message });
    }
};

// 🟢 VERIFY PAYMENT API
exports.verifyPayment = async (req, res) => {
    const { razorpay_order_id, razorpay_payment_id, razorpay_signature } = req.body;

    const hmac = crypto.createHmac("sha256", razorpayKeySecret);
    hmac.update(`${razorpay_order_id}|${razorpay_payment_id}`);
    const generatedSignature = hmac.digest("hex");

    if (generatedSignature === razorpay_signature) {
        res.status(200).json({ success: true, message: "Payment verified successfully" });
    } else {
        res.status(400).json({ success: false, message: "Invalid signature" });
    }
};

PaymentButton.jsx

import axios from 'axios';

const PaymentButton = ({ amount }) => {
    const handlePayment = async () => {
        try {
            const { data } = await axios.post('/api/payments/create-order', {
                amount,
                currency: 'INR',
                receipt: `receipt_${Date.now()}`,
            });

            const options = {
                key: process.env.REACT_APP_RAZORPAY_KEY_ID, // From .env
                amount: data.order.amount,
                currency: data.order.currency,
                name: 'Your Company',
                description: 'Test Transaction',
                order_id: data.order.id,
                handler: async (response) => {
                    try {
                        const verify = await axios.post('/api/payments/verify-payment', response);
                        if (verify.data.success) {
                            alert('Payment Successful');
                        } else {
                            alert('Payment Verification Failed');
                        }
                    } catch (verificationError) {
                        alert('Payment verification failed. Please try again.');
                        console.error('Verification error', verificationError);
                    }
                },
                prefill: {
                    name: 'Customer Name',
                    email: 'customer@example.com',
                    contact: '9999999999',
                },
                theme: {
                    color: '#3399cc',
                },
            };

            const rzp = new window.Razorpay(options);
            rzp.open();
        } catch (error) {
            alert('An error occurred while processing the payment. Please try again.');
            console.error('Payment error', error);
        }
    };

    return <button onClick={handlePayment}>Pay Now</button>;
};

export default PaymentButton;


