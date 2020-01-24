// Print
function myFunction() {
window.print();
}
// +- BButtons
function plus() {
  document.getElementById("quantity").stepUp(1);
}
function minus() {
  document.getElementById("quantity").stepDown(1);
}
// Sum Price+Quantity
function sum() {
a = Number(document.getElementById('quantity').value);
b = Number(document.getElementById('price').value);
c = a * b;
document.getElementById('total').value = c;}
