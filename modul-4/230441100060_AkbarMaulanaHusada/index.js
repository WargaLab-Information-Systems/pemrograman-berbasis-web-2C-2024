// let dropdown = document.getElementsByClassName('.dropdown')
// let ul = document.querySelector('.dropdown ul')

// function munculdropdown(){
//     if (style.display === 'none'){
//         ul.style.display = 'block'
//     }
//     else{
//         ul.style.display = 'none'
//     }
// }

// dropdown.addEventListener("click",munculdropdown)
function munculdropdown(){
    if (document.querySelector('.dropdown ul').style.display == 'none'){
        document.querySelector('.dropdown ul').style.display = 'block'
    }
    else{
        document.querySelector('.dropdown ul').style.display = 'none'
    }
}

function add(){

    const ul = document.getElementById('list-todo')
    let inputText = document.getElementById('text')

    // let li = document.createElement('li')
    // let text = document.createTextNode(inputText.value)
    // li.appendChild(text)
    // ul.appendChild(li)

    let newList = "<li><p>" + inputText.value + "</p><button class='edit' onclick='edit(this)'>edit</button><button class='hapus' onclick='hapus(this)'>del</button></li>"

    ul.insertAdjacentHTML('afterbegin', newList)
}

function cancel(){
    let inputText = document.getElementById('text')
    inputText.value = ""
}

function edit(element){
    let input = document.getElementById('text');
    let li = element.parentNode;
    let p = li.querySelector('p');
    input.value = p.textContent;

    let save = document.querySelector(".tambah")
    save.textContent = "Save"
    save.setAttribute("onclick", "");
    save.addEventListener("click", () => {
        p.textContent = input.value;
        save.setAttribute("onclick", "add()");
        save.textContent = "Add";
    })
}

function hapus(element){
    element.parentElement.remove();
}


// let play = document.getElementsByTagName("i");
// function playmusic() {
//     let audio = new Audio("A Little Piece Of Heaven.mp3");
//     audio.play();
// }
// play.addEventListener("click", playmusic)

// const playlist = [
//     "Modul4/A Little Piece Of Heaven.mp3",
//     "Modul4/Gunslinger.mp3",
//     "Modul4/Gunslinger.mp3",
//     "Modul4/So Far Away.mp3"
// ]

// let audio = document.getElementById('myAudio')
// function playMusic(index){
//     audio.src = playlist[index]
//     audio.play()
// }

let audio;
let isPlaying = false;
let musicSebelumnya = "";
let btnSebelumnya = null;

function playMusic(button, music) {
    if (!audio || music !== musicSebelumnya) {
        if (audio) {
            audio.pause();
        }
        audio = new Audio(music);
        audio.play();
        musicSebelumnya = music;
        isPlaying = true;
        if (btnSebelumnya !== null) {
            btnSebelumnya.setAttribute("class", "fa-solid fa-play");
                }
        button.setAttribute("class", "fa-solid fa-pause");
    } else {
        if (isPlaying) {
            audio.pause();
            isPlaying = false;
            button.setAttribute("class", "fa-solid fa-play");
        } else {
            audio.play();
            isPlaying = true;
            button.setAttribute("class", "fa-solid fa-pause");
        }
    }
    
    btnSebelumnya = button;
}
