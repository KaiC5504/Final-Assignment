document.addEventListener("DOMContentLoaded", function () {
    const enlargeButtons = document.querySelectorAll(".enlarge-btn");

    enlargeButtons.forEach(function (enlargeBtn) {
        enlargeBtn.addEventListener("click", function (event) {
            event.stopPropagation();

            const targetId = enlargeBtn.getAttribute("data-target");
            const hiddenContent = document.getElementById(targetId);

            if (hiddenContent.style.display === "block") {
                closeContent();
            } else {
                showContent(hiddenContent, enlargeBtn);
            }

            document.addEventListener("click", closeContent);
        });
    });

    function showContent(content, button) {
        content.style.display = "block";

        const buttonRect = button.getBoundingClientRect();
        content.style.top = buttonRect.bottom + "px";
        content.style.left = buttonRect.left + "px";

        button.classList.add("enlarged");
    }

    function closeContent() {
        const hiddenContents = document.querySelectorAll(".hidden-content");
        const enlargeButtons = document.querySelectorAll(".enlarge-btn");

        hiddenContents.forEach(function (content) {
            content.style.display = "none";
        });

        enlargeButtons.forEach(function (button) {
            button.classList.remove("enlarged");
        });

        document.removeEventListener("click", closeContent);
    }
});
