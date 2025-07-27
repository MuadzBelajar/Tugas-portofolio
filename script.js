// Smooth scroll (redundant if html { scroll-behavior: smooth } digunakan)
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

// Scroll Reveal
const revealElements = document.querySelectorAll('section');

const revealOnScroll = () => {
  revealElements.forEach(section => {
    const rect = section.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      section.style.opacity = 1;
      section.style.transform = 'translateY(0)';
    }
  });
};

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', () => {
  revealElements.forEach(section => {
    section.style.opacity = 0;
    section.style.transform = 'translateY(40px)';
  });
  revealOnScroll();
});

// Typing Effect
const text = "Vocational School\nStudent.";
let index = 0;
const typingTarget = document.getElementById("typing-text");

function type() {
  if (index < text.length) {
    typingTarget.innerHTML += text[index] === "\n" ? "<br>" : text[index];
    index++;
    setTimeout(type, 100);
  }
}

window.addEventListener("load", type);

// Back to Top
const backToTop = document.getElementById("backToTop");

window.onscroll = function () {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    backToTop.style.display = "block";
  } else {
    backToTop.style.display = "none";
  }
};

backToTop.onclick = function () {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

document.querySelector("#contacts").addEventListener("click", () => {
  confetti({
    particleCount: 100,
    spread: 70,
    origin: { y: 0.6 }
  });
});

// Target semua link di nav (header)
const headerLinks = document.querySelectorAll("header nav a");

headerLinks.forEach(link => {
  link.addEventListener("click", () => {
    confetti({
      particleCount: 80,
      spread: 60,
      origin: { y: 0.2 }
    });
  });
});

// Kursor efek lingkaran glow
const cursor = document.createElement("div");
cursor.style.width = "20px";
cursor.style.height = "20px";
cursor.style.border = "2px solid #4426e7";
cursor.style.borderRadius = "50%";
cursor.style.position = "fixed";
cursor.style.pointerEvents = "none";
cursor.style.transition = "transform 0.1s ease-out";
cursor.style.zIndex = "9999";
document.body.appendChild(cursor);

document.addEventListener("mousemove", (e) => {
  cursor.style.transform = `translate(${e.clientX - 10}px, ${e.clientY - 10}px)`;
});

// Efek emoji bintang mengikuti kursor
document.addEventListener("mousemove", (e) => {
  const star = document.createElement("div");
  star.textContent = "💤";
  star.style.position = "absolute";
  star.style.left = e.pageX + "px";
  star.style.top = e.pageY + "px";
  star.style.fontSize = "18px";
  star.style.pointerEvents = "none";
  star.style.opacity = 1;
  star.style.transition = "all 0.8s ease-out";

  document.body.appendChild(star);

  setTimeout(() => {
    star.style.opacity = 0;
    star.style.transform = "translateY(-20px)";
  }, 10);

  setTimeout(() => {
    document.body.removeChild(star);
  }, 800);
});

