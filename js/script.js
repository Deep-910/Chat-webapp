//Read Messages  from the database
let msgdiv = document.querySelector(".msg");
fetch("readingMsg.php")
  .then((r) => {
    if (r.ok) {
      return r.text();
    }
  })
  .then((d) => {
    msgdiv.innerHTML = d;
  });

//ADDMessage to the Databsae
window.onkeydown = (e) => {
  if (e.key == "Enter") {
    update();
  }
};
function update() {
  let msg = input_msg.value;
  input_msg.value = "";
  fetch(`addmsg.php?msg=${msg}`)
    .then((r) => {
      if (r.ok) {
        return r.text();
      }
    })
    .then((d) => {
      console.log("msg has been sented.");
    });
}
