"use strict";
var input = document.getElementsByTagName("ace--input");
var textArea = document.getElementsByTagName("ace--textarea");




for(let i = 0; i < input.length; i++){
	input[i].style = "display: block;";
	let inID = input[i].getAttribute("input-id")?' id="'+input[i].getAttribute("input-id")+'" ':'id="aceInputRandom'+[i]+'"';
	let inID2 = input[i].getAttribute("input-id")?' for="'+input[i].getAttribute("input-id")+'" ':'for="aceInputRandom'+[i]+'"';
	let inType = input[i].getAttribute("type")?' type="'+input[i].getAttribute("type")+'"':"";
	let inName = input[i].getAttribute("name")?' name="'+input[i].getAttribute("name")+'"':"";
	let inValue = input[i].getAttribute("value")?' value="'+input[i].getAttribute("value")+'"':"";
	let required = input[i].hasAttribute("required")?' required':"";
	let lbl = input[i].innerHTML;
	let inClass = input[i].getAttribute("inClass")?'class="'+input[i].getAttribute("inClass")+'"':"";
	let lblClass = input[i].getAttribute("lblClass")?'class="ace--Center '+input[i].getAttribute("lblClass")+'"':'class="ace--Center"';
	
	let inCre = '<input '+inID+inClass+inType+inName+inValue+required+' >';
	let lblCre = '<label '+inID2+lblClass+'><lbl>'+lbl+'</lbl></label>';
	
	
	input[i].innerHTML = inCre + lblCre;
	
	let chInput = input[i].getElementsByTagName("input")[0];
	let chLbl = input[i].getElementsByTagName("label")[0];
	
	
	
	input[i].getAttribute("placeholder")?chInput.placeholder = input[i].getAttribute("placeholder"):"";
	
	chInput.onclick = function() {
		this.parentNode.getElementsByTagName("label")[0].classList.add('labelActive');
	}
	chInput.onblur = function() {
		if(this.parentNode.getElementsByTagName("input")[0].value != '' && this.parentNode.getElementsByTagName("input")[0].value != ' ')
			this.parentNode.getElementsByTagName("label")[0].classList.add('labelActive');
		else{
			this.parentNode.getElementsByTagName("label")[0].classList.remove('labelActive');
			this.parentNode.getElementsByTagName("input")[0].value = '';
		}
	}
}
for(let i = 0; i < textArea.length; i++){
	textArea[i].style = "display: block;";
	let inID = textArea[i].getAttribute("textArea-id")?' id="'+textArea[i].getAttribute("textArea-id")+'" ':'id="acetextAreaRandom'+[i]+'"';
	let inID2 = textArea[i].getAttribute("textArea-id")?' for="'+textArea[i].getAttribute("textArea-id")+'" ':'for="acetextAreaRandom'+[i]+'"';
	let inType = textArea[i].getAttribute("type")?' type="'+textArea[i].getAttribute("type")+'"':"";
	let inName = textArea[i].getAttribute("name")?' name="'+textArea[i].getAttribute("name")+'"':"";
	let inValue = textArea[i].getAttribute("value")?' value="'+textArea[i].getAttribute("value")+'"':"";
	let required = textArea[i].hasAttribute("required")?' required':"";
	let lbl = textArea[i].innerHTML;
	let inClass = textArea[i].getAttribute("inClass")?'class="'+textArea[i].getAttribute("inClass")+'"':"";
	let lblClass = textArea[i].getAttribute("lblClass")?'class="ace--Center '+textArea[i].getAttribute("lblClass")+'"':'class="ace--Center"';
	
	let inCre = '<textarea '+inID+inClass+inType+inName+inValue+required+' ></textarea>';
	let lblCre = '<label '+inID2+lblClass+'>'+lbl+'</label>';
	
	
	textArea[i].innerHTML = inCre + lblCre;
	
	let chtextArea = textArea[i].getElementsByTagName("textArea")[0];
	let chLbl = textArea[i].getElementsByTagName("label")[0];
	
	
	
	textArea[i].getAttribute("placeholder")?chtextArea.placeholder = textArea[i].getAttribute("placeholder"):"";
	
	chtextArea.onclick = function() {
		this.parentNode.getElementsByTagName("label")[0].classList.add('labelActive');
	}
	chtextArea.onblur = function() {
		if(this.parentNode.getElementsByTagName("textArea")[0].value != '' && this.parentNode.getElementsByTagName("textArea")[0].value != ' ')
			this.parentNode.getElementsByTagName("label")[0].classList.add('labelActive');
		else{
			this.parentNode.getElementsByTagName("label")[0].classList.remove('labelActive');
			this.parentNode.getElementsByTagName("textArea")[0].value = '';
		}
	}
}

function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}


var feed = document.getElementById('instaFeed');
var ifVM = document.getElementById('ifVM');
const ifPost = document.getElementsByClassName('ifPost')[0];
const postH = ifPost.offsetHeight;
var pos = 8;
feed.style.height = `${postH*3+60}px`;
async function loadMore(){
	let get = await fetch(`apps/instagramApp.php?pos=${pos}`);
	let response = await get.text();
	let ret = JSON.parse(response);
	let fH = feed.offsetHeight;
	let rows = Math.ceil(ret['urls'].length/3);
	const postJ = postH*rows + fH + 30*rows;
	
	
	ret['urls'].forEach(addMore);
	if(!ret['more']){
		ifVM.style.display = 'none';
	}
	
	feed.style.transition = `height .7s .2s ease-out`;
	setTimeout(()=>{feed.style.height = `${postJ}px`},100);
	
	pos+=6;
	
	function addMore(a){
		if(a['media_type'] == 'VIDEO'){
			feed.innerHTML += `
				<div class=\"ifPost ace--pos-Relative ace--outline\" onclick='ScrollTo(this)'>
					<div class=\"ifImg\"><video loop> <source src='${a['media_url']}' type="video/mp4"></video></div>
					<div class=\"ifFore ace--Center\" onClick=\"this.classList.toggle('ifFore-active')\">
						<div class=\"ifFore-info ace--Center\">
							<a href='${a['permalink']}' target='_blank'>— Go to Post —</a>
						</div>
					</div>
				</div>`;
		}else{
		feed.innerHTML += `
			<div class=\"ifPost ace--pos-Relative ace--outline\" onclick='ScrollTo(this)'>
				<div class=\"ifImg\"><img src='${a['media_url']}'></div>
				<div class=\"ifFore ace--Center\" onClick=\"this.classList.toggle('ifFore-active')\">
					<div class=\"ifFore-info ace--Center\">
						<a href='${a['permalink']}' target='_blank'>— Go to Post —</a>
					</div>
				</div>
			</div>`;}
	}
}


var nav = document.getElementById('nav');
var container = document.getElementById('Container');
const navHide = 100;

container.addEventListener('scroll', function () {
	var vids = document.querySelectorAll('.ifImg video');
    vids.forEach(playVid);
	if(container.scrollTop >= navHide){
		nav.classList.add('navHideM');
	}else{
		nav.classList.remove('navHideM');
	}
}, {
    passive: true
});


function playVid(a, b, c){
	isInViewport(c[b])? c[b].play():c[b].pause();
}

function ScrollTo(a){
    var headerOffset = container.clientHeight/2-a.clientHeight/2;
    var elementPosition = a.getBoundingClientRect().top;
    var offsetPosition = elementPosition +  container.scrollTop - headerOffset;
    container.scrollTo({
         top: offsetPosition,
         behavior: "smooth"
    });
}







