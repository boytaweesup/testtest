const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
// const btnPopup = document.getElementById("btnLogin-popup");
const iconClose = document.querySelector(".icon-close");
const addFormMember = document.getElementById("add-member-form");
const loginFormMember = document.getElementById("login-form");
const addFormProduct = document.getElementById("add-product-form");
const addFormOrder = document.getElementById("add-order-form");

registerLink.addEventListener("click", () => {
  wrapper.classList.add("active");
});

loginLink.addEventListener("click", () => {
  wrapper.classList.remove("active");
});
function btnLogin_popup(e) {
  e.preventDefault();
  wrapper.classList.add("active-popup");
}

// btnPopup.addEventListener("click", () => {
//   wrapper.classList.add("active-popup");
// });

iconClose.addEventListener("click", () => {
  wrapper.classList.remove("active-popup");
});

addFormMember.addEventListener("submit", async (e) => {
  e.preventDefault();
console.log(addFormMember);
  const formData = new FormData(addFormMember);
  formData.append("addmember", 1);

  const data = await fetch("action.php", {
    method: "POST",
    body: formData,
  }).then(function (res) {
    Swal.fire("Registration completed!", "You clicked the button!", "success");
    setTimeout(function () {
      window.location.reload();
    }, 2000);
  });
});
addFormProduct.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(addFormProduct);
  formData.append("addproduct", 1);

  const data = await fetch("action.php", {
    method: "POST",
    body: formData,
  }).then(function (res) {
    Swal.fire("Add Product completed!", "You clicked the button!", "success");
    setTimeout(function () {
      window.location.reload();
    }, 2000);
  });
});

addFormOrder.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(addFormOrder);
  formData.append("addorder", 1);

  const data = await fetch("action.php", {
    method: "POST",
    body: formData,
  }).then(function (res) {
    Swal.fire("Add Order completed!", "You clicked the button!", "success");
    setTimeout(function () {
      window.location.reload();
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
    Swal.fire("login completed!", "You clicked the button!", "success");
    setTimeout(function () {
      window.location.reload();
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
    confirmButtonText: "Yes, logout",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "logout.php";
    }
  });
}

const fetchorder = async () => {
  const formData = new FormData();
  formData.append("selectorder", 1);

  const data = await fetch("action.php", {
    method: "POST",
    body: formData,
  });
  const response = await data.json();
  response.forEach((element) => {
    // console.log(element.Product_Name);
    document.getElementById("select_order").innerHTML +=
      '<option value="' +
      element.Product_Name +
      '">' +
      element.Product_Name +
      "</option>";
  });

  // tbody.innerHTML = response;
};
fetchorder();
