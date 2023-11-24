const Photo = document.getElementById("photo")
const Files = document.querySelector('input[type="file"]')
const submite = document.querySelector('input[type="button"]')

submite.addEventListener('click',()=>{
    Files.addEventListener('change',()=>{
        let img = File[0];
        const reader = new FileReader()
        reader.onload = ()=> {
            const allImg = document.querySelectorAll('img');
            allImg.forEach(item => item.remove());
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            Photo.appendChild('img');
            Photo.classList.add('.img');
            Photo.dataset.img = img.name;
        }
      
    })
})
