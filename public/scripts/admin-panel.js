// Get buttons
const lightModeBtn = document.getElementById("lightMode");
const darkModeBtn = document.getElementById("darkMode");
const profilePic = document.getElementById("profilePic");
const dropdown = document.getElementById("dropdown");
const arrow = document.getElementById("arrow");
const bell = document.getElementById("bell");
const menuItems = document.querySelectorAll(".left-menu-element");
const contentDivs = document.querySelectorAll(".content-div");
const content = document.getElementById("content");

// Add event listeners
lightModeBtn.addEventListener("click", () => {
    lightModeBtn.classList.add("active");
    darkModeBtn.classList.remove("active");
    arrow.style.color = "#222222"
    bell.style.color = "#222222"
    content.style.backgroundColor = "#ffffff"
    document.body.style.backgroundColor = "#ffffff"; // Light mode
});

darkModeBtn.addEventListener("click", () => {
    darkModeBtn.classList.add("active");
    lightModeBtn.classList.remove("active");
    arrow.style.color = "#4a6cf7"
    bell.style.color = "#4a6cf7"
    content.style.backgroundColor = "#000000"
    document.body.style.backgroundColor = "#222222"; // Dark mode
});

profilePic.addEventListener("click", () => {
    dropdown.style.display = dropdown.style.display === "flex" ? "none" : "flex";
    arrow.style.transform = dropdown.style.display === "flex" ? "rotate(180deg)" : "rotate(0deg)";
});

arrow.addEventListener("click", () => {
    dropdown.style.display = dropdown.style.display === "flex" ? "none" : "flex";
    arrow.style.transform = dropdown.style.display === "flex" ? "rotate(180deg)" : "rotate(0deg)";
});

function loadContent(index) {
    contentDivs.forEach(div => div.style.display = "none");
    contentDivs[index].style.display = "block";
    menuItems.forEach(item => item.classList.remove("active"));
    menuItems[index].classList.add("active");
}
menuItems.forEach((item, index) => {
    item.addEventListener("click", () => loadContent(index));
});

loadContent(0);