var $url;
var $token;
var productList = [];

function url(url){
    $url = url;
}

function token(token){
    $token = token;
}

function addHidden(theForm, key, value) {
    // Create a hidden input element, and append it to the form:
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = key;//'name-as-seen-at-the-server';
    input.value = value;
    theForm.appendChild(input);
}

var removeByAttr = function(arr, attr, value){
    var i = arr.length;
    while(i--){
        if( arr[i]
            && arr[i].hasOwnProperty(attr)
            && (arguments.length > 2 && arr[i][attr] === value ) ){

            arr.splice(i,1);

        }
    }
    return arr;
}

function isNormalInteger(str) {
    var n = ~~Number(str);
    return String(n) === str && n >= 0;
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}

NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

function removeProductOfList(id){
    removeByAttr(productList, 'detailNumber', id);
}

function Product(id, quantity, detailNumber) {
    this.id = id;
    this.quantity = quantity;
    this.detailNumber = detailNumber;
}

function addProductInList(id, quantity, detailNumber){
    var product = new Product(id, quantity, detailNumber);
    productList.push(product);
}