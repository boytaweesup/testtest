const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const btnPopup = document.getElementById("btnLogin-popup");
const iconClose = document.querySelector(".icon-close");
const addFormMember = document.getElementById("add-member-form");
const loginFormMember = document.getElementById("login-form");

registerLink.addEventListener("click", () => {
  wrapper.classList.add("active");
});

loginLink.addEventListener("click", () => {
  wrapper.classList.remove("active");
});

btnPopup.addEventListener("click", () => {
  wrapper.classList.add("active-popup");
});

iconClose.addEventListener("click", () => {
  wrapper.classList.remove("active-popup");
});

addFormMember.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(addFormMember);
  formData.append("addmember", 1);
      
    const data = await fetch("action.php", {
      method: "POST",
      body: formData,
    }).then(function (res) {
      
      Swal.fire(
        "Registration completed!",
        "You clicked the button!",
        "success"
      );
      setTimeout(function () {
        window.location.reload()
      }, 2000);
    });
  
});

loginFormMember.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(loginFormMember);
  formData.append("login", 1);

  const data = await fetch("action.php", {
    method: "POST",
    body: formData,
  }).then(function (res) {
    
    Swal.fire(
      "Registration completed!",
      "You clicked the button!",
      "success"
    );
    setTimeout(function () {
      window.location.reload()
    }, 2000);
  });

});

function logout(e) {
 
  e.preventDefault();

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, logout"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'logout.php';
    }
  });
  
}
