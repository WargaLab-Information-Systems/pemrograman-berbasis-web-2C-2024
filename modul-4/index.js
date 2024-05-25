const dropdowns = document.querySelectorAll('.dropdwon'); // Menggunakan nama variabel yang benar

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select'); // Menggunakan nama yang benar
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li'); // Gunakan querySelectorAll untuk semua opsi
    const selected = dropdown.querySelector('.selected');

    select.addEventListener('click', () => {
        select.classList.toggle('select-clicked');
        caret.classList.toggle('caret-rotate');
        menu.classList.toggle('menu-open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.innerText = option.innerText;
            select.classList.remove('select-clicked');
            caret.classList.remove('caret-rotate');
            menu.classList.remove('menu-open');
            options.forEach(opt => {
                opt.classList.remove('active'); // Perbaiki nama variabel
            });
            option.classList.add('active');
        });
    });
});


// const dropdows = document.querySelectorAll('.dropdwon');

// dropdows.forEach(dropdow => {
//     const select = dropdown.querySelector('.select');
//     const caret = dropdown.querySelector('.caret');
//     const menu = dropdown.querySelector('.menu');
//     const options = dropdown.querySelector('.menu li');
//     const selected = dropdown.querySelector('.selected');
    
//     select.addEventListener('click', () => {
//         select.classList.toggle('select-clicked');
//         caret.classList.toggle('caret-rotate');
//         menu.classList.toggle('menu-open');
//     });

//     options.forEach(option =>{
//         option.addEventListener('click', ()=>{
//             selected.innerText = option.innerText;
//             select.classList.remove('select-clicked');
//             caret.classList.remove('caret-rotate');
//             menu.classList.remove('menu-open');
//             options.forEach(option => {
//                 option.classList.remove('active');
//             });
//             option.classList.add('active');
//         });
//     });    
// });