// dapatkan semua dokumen dari dokumen
const dropdowns = document.querySelectorAll('.dropdown');
//ulangi semua elemen dropdown
dropdowns.forEach(dropdown => {
    //dapatkan elemen dalam dari setiap dropdown
    const select = dropdown.querySelector('.select');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected = dropdown.querySelector('.selected');


    //tambahkan acara klik ke elemen pilih
    select.addEventListener('click', () => {
        //tambahkan gaya pilihan yang diklik ke elemen pilihan
        select.classList.toggle('select-clicked');
        //tambahkan gaya putar ke elemen tanda sisipan
        caret.classList.toggle('caret-rotate');
        //tambahkan gaya terbuka ke elemen menu
        menu.classList.toggle('menu-open');
    });

    //ulangi semua elemen opsi
    options.forEach(option => {
        //tambahkan acara o klik ke elemen opsi
        option.addEventListener('click', () => {
            //ubah teks dalam yang dipilih menjadi teks dalam opsi yang diklik
            selected.innerText = option.innerText;
            //tambahkan gaya pilihan yang diklik ke elemen pilihan
            select.classList.remove('select-clicked');
            //tambahkan gaya putar ke elemen tanda sisipan
            caret.classList.remove('caret-rotate');
            //tambahkan gaya terbuka ke elemen menu
            menu.classList.remove('menu-open');
            //hapus kelas aktif dari semua elemen opsi
            option.forEach(option => {
                option.classList.remove('active');
            });
            //tambahkan kelas aktif ke elemen opsi yang diklik
            option.classList.add('active');
        });
    });
});