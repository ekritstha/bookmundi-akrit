//task1
function changeClassName() {
  const elements = document.querySelectorAll(".class-name");
  elements.forEach((element) => {
    element.classList.remove("old-name");
    element.classList.add("new-name");
  });
}

function getDataSet(selector) {
  const el = document.querySelector(selector);
  const datasets = el.dataset;
  console.log(datasets);
}

function addNewDomElement() {
  const el = document.querySelector("#empty-div");
  el.innerHTML = "<p>Lets add some text to an empty div.</p>";
}

function setInputValues() {
  document.querySelector("#name").value = "John Doe";
  document.querySelector("#dropdown").value = "456";
  document.querySelector("#checkbox").checked = true;
}

function getInputValues() {
  let textInput = document.querySelector("#name").value;
  let dropdownInput = document.querySelector("#dropdown").value;
  let checkboxInput = document.querySelector("#checkbox").checked;
  console.log([textInput, dropdownInput, checkboxInput]);
}
changeClassName();
getDataSet("#empty-div");
addNewDomElement();
getDataSet("#empty-div");
setInputValues();

//task 2
function multiplePostMethods() {
  Promise.all([
    fetch("url1", {
      method: "POST",
      body: {},
    }),
    fetch("url2", {
      method: "POST",
      body: {},
    }),
    fetch("url3", {
      method: "POST",
      body: {},
    }),
  ])
    .then(async ([res1, res2, res3]) => {
      const a = await res1.json();
      const b = await res2.json();
      const c = await res3.json();
    })
    .catch((error) => {
      console.log(error);
    });
}

//task 3
function copyText() {
  var copyText = document.getElementById("span-text");
  var textArea = document.createElement("textarea");
  textArea.value = copyText.textContent;
  document.body.appendChild(textArea);
  textArea.select();
  document.execCommand("Copy");
  textArea.remove();
  alert("Copied the text: " + copyText.textContent);
}

//task 4
var person = (function (el) {
  return {
    set age(v) {
      el.value = v;
    },
    get age() {
      return el.value;
    },
  };
})(document.getElementById("personName"));

person.age = "John Doe";
