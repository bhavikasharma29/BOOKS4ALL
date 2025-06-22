document.addEventListener("DOMContentLoaded", () => {
    // FAQ toggle functionality using active class for smooth transitions
    document.querySelectorAll(".faq-question").forEach((button) => {
        button.addEventListener("click", () => {
            const answer = button.nextElementSibling;
            const arrow = button.querySelector(".arrow");

            if (answer.classList.contains("active")) {
                // Collapse the answer
                answer.classList.remove("active");
                if (arrow) arrow.style.transform = "rotate(0deg)";
            } else {
                // Optionally, collapse any open FAQ answers first
                document.querySelectorAll(".faq-answer.active").forEach((openAnswer) => {
                    openAnswer.classList.remove("active");
                    const openArrow = openAnswer.previousElementSibling.querySelector(".arrow");
                    if (openArrow) openArrow.style.transform = "rotate(0deg)";
                });
                // Expand the clicked FAQ answer
                answer.classList.add("active");
                if (arrow) arrow.style.transform = "rotate(180deg)";
            }
        });
    });

    // Email validation functionality
    const form = document.getElementById("contactForm");
    const emailInput = document.getElementById("email");
    const emailError = document.getElementById("emailError");

    // Real-time email validation
    emailInput.addEventListener("input", () => {
        validateEmail();
    });

    // Prevent form submission if email is invalid
    form.addEventListener("submit", function (event) {document.addEventListener("DOMContentLoaded", () => {
        // Email validation functionality
        const form = document.getElementById("contactForm");
        const emailInput = document.getElementById("email");
        const emailError = document.getElementById("emailError");
    
        // Real-time email validation
        emailInput.addEventListener("input", () => {
            validateEmail();
        });
    
        // Prevent form submission if email is invalid
        form.addEventListener("submit", function (event) {
            if (!validateEmail()) {
                event.preventDefault();
            }
        });
    
        function validateEmail() {
            const emailValue = emailInput.value.trim();
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            
            if (!emailPattern.test(emailValue)) {
                emailError.textContent = "Please enter a valid email address.";
                emailError.style.display = "block";
                emailInput.style.border = "1px solid #ff4d4d"; // Highlight error
                return false;
            } else {
                emailError.style.display = "none";
                emailInput.style.border = "1px solid #66ccff"; // Reset border on valid input
                return true;
            }
        }
    });
    
        if (!validateEmail()) {
            event.preventDefault();
        }
    });

    function validateEmail() {
        const emailValue = emailInput.value.trim();
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        
        if (!emailPattern.test(emailValue)) {
            emailError.textContent = "Please enter a valid email address.";
            emailError.style.display = "block";
            emailInput.style.border = "1px solid #ff4d4d"; // Highlight error
            return false;
        } else {
            emailError.style.display = "none";
            emailInput.style.border = "1px solid #66ccff"; // Reset border on valid input
            return true;
        }
    }
});
