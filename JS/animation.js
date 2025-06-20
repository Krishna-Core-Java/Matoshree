var tl = gsap.timeline();

tl
    .to("#upperankit", {
        height: 0,
        duration: 7.5,
        delay:1,
        ease: Expo.easeInOut
    })
    .to("#midankit", {
        height: "100vh",
        duration: 1,
        delay: -7,
        ease: Expo.easeInOut
    })
    .to("#ankit", {
        height: "100vh",
        duration: 1,
        delay: -6.6,
        ease: Expo.easeInOut
    })
    .from(".logo",{
        opacity:0,
        y:-20,
        duration:1,
        delay:-6.2
    })
    .from(".nav-item",{
        opacity:0,
        y:-20,
        duration:1,
        delay:-5.5,
        stagger:0.3,
    })
    .from(".ankit2",{
        opacity:0,
        y:-20,
        duration:1,
        delay:-4.5,
        stagger:0.3,
    })
    .from(".ankit1",{
        opacity:0,
        y:30,
        duration:1,
        delay:-3.5,
        stagger:1
    })


gsap.from("#firsthead", {
    opacity:0,
    x:100,
    duration:2,
    ease: Expo.easeInOut
})
