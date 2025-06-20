<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Admin Dashboard - Matoshree Resort</title>
  <link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>

  <div class="full">

    <div class="side-bar">

      <div class="brand">
        <h1>Matoshree</h1>
        <h2>Resort & River Park</h2>
      </div>

      <div class="bar">

        <a href="../PHP/admin.php">Home</a>
        <a href="../PHP/Admin_Room.php">Room Booking</a>
        <a href="../PHP/admin_event.php">Event Booking</a>
        <a href="../PHP/event-payment.php">Event Payment</a>
        <a href="../PHP/room-payment.php">Room Payment</a>
        <a href="../PHP/section.php">Log Out</a>


      </div>

    </div>

    <div class="main">

      <div class="info">

        <h1>Home</h1>

        <div class="small">

          <div class="new-booking box">
            <i class="fa-regular fa-calendar"></i>

            <div class="tp">
              <p class="small-info">New Booking</p>
              <p class="num-big">10</p>
            </div>

          </div>

          <div class="Available-room box">
            <i class="fa-solid fa-house"></i>
            <div class="tp">
              <p class="small-info">Available Room</p>
              <p class="num-big">15</p>
            </div>

          </div>

          <div class="Check-in box">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>

            <div class="tp">
              <p class="small-info">Check In</p>
              <p class="num-big">8</p>
            </div>

          </div>

          <div class="check-out box">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>

            <div class="tp">
              <p class="small-info">Check Out</p>
              <p class="num-big">9</p>
            </div>

          </div>

        </div>

      </div>

      <div class="data">

        <div class="date">

          <div class="panel">
            <h3>Total Sales & Cost</h3>
            <p>Last 60 days</p>

            <div class="sales-item">
              <div class="sales-value">$956.82K</div>
              <div class="sales-change">+4.50%</div>
              <div class="sales-comparison">+2.00k vs previous 60 days</div>
            </div>
            <div class="sales-item">
              <div class="sales-value">$0.5K</div>
              <div class="sales-change">+0.5%</div>
              <div class="sales-comparison">+1.00 Avg</div>
            </div>
            <div class="sales-item">
              <div class="sales-value">$0.5K</div>
              <div class="sales-change">+0.5%</div>
              <div class="sales-comparison">+1.00 Avg</div>
            </div>
            <div class="sales-item">
              <div class="sales-value">$0.5K</div>
              <div class="sales-change">+0.5%</div>
              <div class="sales-comparison">+1.00 Nov</div>
            </div>
          </div>

        </div>

        <div class="circle">

          <div class="panel">
            <h3>Product Stock</h3>

            <div class="progress-container">

              <div class="progress-item">

                <div class="progress-label">
                  <span>Profile</span>
                  <span>73%</span>
                </div>

                <div class="progress-bar">
                  <div class="progress-fill" style="width: 73%"></div>
                </div>

              </div>

              <div class="progress-item">

                <div class="progress-label">
                  <span>Mobile</span>
                  <span>20%</span>
                </div>

                <div class="progress-bar">
                  <div class="progress-fill" style="width: 20%"></div>
                </div>

              </div>

              <div class="progress-item">

                <div class="progress-label">
                  <span>Todots</span>
                  <span>30%</span>
                </div>

                <div class="progress-bar">
                  <div class="progress-fill" style="width: 30%"></div>
                </div>

              </div>

              <div class="progress-item">

                <div class="progress-label">
                  <span>Logistics</span>
                  <span>20%</span>
                </div>

                <div class="progress-bar">
                  <div class="progress-fill" style="width: 20%"></div>
                </div>

              </div>

              <div class="progress-item">

                <div class="progress-label">
                  <span>Television</span>
                  <span>20%</span>
                </div>

                <div class="progress-bar">
                  <div class="progress-fill" style="width: 20%"></div>
                </div>

              </div>

            </div>

          </div>



        </div>

      </div>

    </div>

  </div>

</body>

</html>