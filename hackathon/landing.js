document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        document.getElementById("welcome-message").style.display = "none";
    }, 3000);

    let index = 0;
    function slideImages() {
        const slides = document.querySelector(".slides");
        const totalImages = document.querySelectorAll(".slides img").length;
        index = (index + 1) % totalImages;
        slides.style.transform = `translateX(-${index * 100}vw)`;
    }

    setInterval(slideImages, 3000);
});
document.addEventListener("DOMContentLoaded", function () {
    const faqButtons = document.querySelectorAll(".faq-question");

    faqButtons.forEach(button => {
        button.addEventListener("click", function () {
            const answer = this.nextElementSibling;
            const arrow = this.querySelector(".arrow");

            // Toggle the max-height for smooth dropdown effect
            if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
                answer.style.padding = "0 15px";
                arrow.style.transform = "rotate(0deg)";
            } else {
                answer.style.maxHeight = answer.scrollHeight + "px";
                answer.style.padding = "15px";
                arrow.style.transform = "rotate(180deg)";
            }
        });
    });
});
