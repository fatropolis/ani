// JavaScript Document

async function catFunc(id){
		let a =document.querySelector("#categoryActive");
	a?a.id = '':'';
		document.getElementById("container-Styles-Inner").innerHTML = '';
	let get = await fetch('apps/bookingApp.php?com='+1+'&id='+id);
	let response = await get.text();
		document.getElementById("container-Styles-Inner").innerHTML = response;
		document.querySelector("[catid='"+id+"']").id = 'categoryActive';
}
async function stylesFunc(id){
		let a =document.querySelector("#styleActive");
	if(a)
		a.id = '';
		document.getElementById("container-Style").innerHTML = '';
	let get = await fetch('apps/bookingApp.php?com='+2+'&id='+id);
	let response = await get.text();
		document.getElementById("container-Style").innerHTML = response;
		document.querySelector("[styleid='"+id+"']").id = 'styleActive';
}
async function bookFunc(id){
	let get = await fetch('apps/bookingApp.php?com='+3+'&id='+id);
	let response = await get.text();
	if(response)
		window.location.href = "bookingCal.php";
}
async function requestCal(dir){
	let test = document.getElementById('cal');
	let cal = document.getElementById('caption');
	let pos = cal.getAttribute('calpos');
	let request = await fetch('apps/calendarApp.php?dir='+dir+'&pos='+pos);
	let response = await request.text();
	test.innerHTML = response;
}

var sideBarID = document.getElementById('sideBar');
var book = document.getElementById('book');
var day = document.getElementById('day');
var slot = document.getElementsByClassName('container-Slot');
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

function sideBar(obj){
	let oDate = obj.getAttribute('day');
	let oYear = oDate.slice(0,4);
	let oMonth = oDate.slice(4,6);
	let oDay = oDate.slice(6);
	let oSlot = obj.getElementsByClassName('slot');
	let idRemove = document.getElementById('slot-Active');
	book.classList.remove('bookReady');
	book.removeAttribute('onClick');
	day.innerHTML = months[oMonth-1]+' '+oDay+', '+oYear;
	if(idRemove)
		idRemove.id = '';
	if(!sideBarID.classList.contains('sideBarActive'))
		sideBarID.classList.add('sideBarActive');
	
	for(var i = 0; i < oSlot.length; i++){
		if(oSlot[i].getAttribute('ace-status') == 0){
			slot[i].classList = 'container-Slot slot-Invalid';
			slot[i].removeAttribute('day');
			slot[i].removeAttribute('onClick');
		}else{
			slot[i].classList = 'container-Slot';
			slot[i].setAttribute('day',oDate);
			slot[i].setAttribute('onClick','slotActive('+oDate+','+(i+1)+');this.id = "slot-Active"');
		}
	}
}
function remSideBar(){
	sideBarID.classList.remove('sideBarActive');
}
function slotActive(day,slot){
	if(document.getElementById('slot-Active'))
		document.getElementById('slot-Active').id = '';
	book.setAttribute('onClick','bookFinal('+day+','+slot+')');
	book.classList.add('bookReady');
}
async function bookFinal(day,slot){
	let get = await fetch('apps/bookingApp.php?com=' + 4 + '&day=' + day + '&slot=' + slot);
	let response = await get.text();
	if(response)
		window.location.href = "payment.php";
}
