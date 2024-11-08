// ------------------- Start Vertical Slide ------------------------

const bgColor = "rgba(255, 255, 255)"; 

const slides = document.querySelectorAll("section");
  const container = document.querySelector("#panelWrap");
  const footer = document.querySelector("footer");
  const anchors = document.querySelectorAll(".anchor");
  let dots = document.querySelector(".dots");
  let toolTips = document.querySelectorAll(".toolTip");
  let oldSlide = 0;
  let activeSlide = 0;
  let navDots = [];
  let dur = 0.6;
  let offsets = [];
  let toolTipAnims = [];
  let ih = window.innerHeight;

  // create nev dots and, tooltip listeners and add anchor listeners
  for (let i = 0; i < slides.length; i++) {
    let tl = gsap.timeline({ paused: true, reversed: true });
    gsap.set(slides[i], { backgroundColor: bgColor });
    let newDot = document.createElement("div");
    newDot.className = "dot";
    newDot.index = i;
    navDots.push(newDot);
    newDot.addEventListener("click", slideAnim);
    newDot.addEventListener("mouseenter", dotHover);
    newDot.addEventListener("mouseleave", dotHover);
    dots.appendChild(newDot);
    // offsets.push(-slides[i].offsetTop);
    tl.to(toolTips[i], 0.25, { opacity: 1, ease: Linear.easeNone });
    toolTipAnims.push(tl);
    anchors.forEach((anchor) => { // listeners for nav anchor
      anchor.addEventListener("click", slideAnim);
    });
  }

  // get elements positioned
  gsap.set(".dots", { yPercent: -50 });
  gsap.set(".toolTips", { yPercent: -50 });

  // side screen animation with nav dots
  const dotAnim = gsap.timeline({ paused: true });
  dotAnim.to(
    ".dot",
    {
      stagger: { each: 1, yoyo: true, repeat: 1 },
      scale: 2.1,
      rotation: 0.1,
      ease: "none",
    },
    0.5
  );
  dotAnim.time(1);

  // tooltips hovers
  function dotHover() {
    toolTipAnims[this.index].reversed()
      ? toolTipAnims[this.index].play()
      : toolTipAnims[this.index].reverse();
  }
  TweenLite.to(Draggable, 2, { throwProps: { x: 500, y: -300 } });
  // figure out which of the 4 nav controls called the function
  function slideAnim(e) {
    let oldSlide = activeSlide;

    // click on a dot
    if (this.className === "dot") {
      activeSlide = this.index;
      // click on a anchor
    } else if ( this.classList && this.classList.contains("anchor")){
      activeSlide = parseInt(this.getAttribute("data-index"), 10);
    // scrollwheel
    } else {
      activeSlide = e.deltaY > 0 ? (activeSlide += 1) : (activeSlide -= 1);
    }

    // make sure we're not past the end or beginning slide
    activeSlide = activeSlide < 0 ? 0 : activeSlide;
    activeSlide =
      activeSlide > slides.length - 1 ? slides.length - 1 : activeSlide;
    if (oldSlide === activeSlide) {
      return;
    }
    // if we're dragging we don't animate the container
    gsap.to(container, dur, {
      y: offsets[activeSlide],
      ease: "power2.inOut",
      onUpdate: tweenDot,
    });
    // console.log( offsets[activeSlide])
    
    // Show or hide the footer when on the last slide
    if (activeSlide === slides.length - 1) {
      footer.classList.add('show'); 
    } else {
      footer.classList.remove('show');
    }
  }

  gsap.set(".hideMe", { opacity: 1 });
  window.addEventListener("wheel", slideAnim);
  window.addEventListener("resize", newSize);

  // // make the container a draggable element
  // let dragMe = Draggable.create(container, {
  //   type: "y",
  //   edgeResistance: 1,
  //   onDragEnd: slideAnim,
  //   onDrag: tweenDot,
  //   onThrowUpdate: tweenDot,
  //   snap: offsets,
  //   inertia: true,
  //   zIndexBoost: false,
  //   allowNativeTouchScrolling: false,
  //   bounds: "#masterWrap",
  //   cursor: "defaulte",
  // });

  // dragMe[0].id = "dragger";
  newSize();

  // resize all panels and refigure draggable snap array
  function newSize() {
    offsets = [];
    ih = window.innerHeight;
    gsap.set("#panelWrap", { height: slides.length * ih });
    gsap.set(slides, { height: ih });
    for (let i = 0; i < slides.length; i++) {
      // offsets.push(-slides[i].offsetTop);
      offsets.push(-ih*(i));
    }
    gsap.set(container, { y: offsets[activeSlide] });
    // dragMe[0].vars.snap = offsets;
  }

  // tween the dot animation as the draggable moves
  function tweenDot() {
    gsap.set(dotAnim, {
      time: Math.abs(gsap.getProperty(container, "y") / ih) + 1,
    });
  }