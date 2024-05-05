document.addEventListener("DOMContentLoaded", function(){
    const itensNavega = [
        {
            img: 'https://i.imgur.com/Rmrlq1a.jpeg',
            titulo:"Almoço",
            tipoReceita: "almoco",
            desc: "Encontre receitas incríveis para seu almoço!",
            link: "receitaAlmoco.php"
        },
        {
            img: 'https://i.imgur.com/NNuIqM2.jpg',
            titulo:"Jantar",
            tipoReceita: "jantar",
            desc: "Encontre receitas incríveis para seu Jantar!",
            link: "receitaJantar.php"
        },
        {
            img: 'https://i.imgur.com/rcpXJxu.jpg',
            titulo:"Salgados",
            tipoReceita: "salgado",
            desc: "Descubra receitas fáceis de salgados!",
            link: "salgados.php"
        },
        {
            img: 'https://i.imgur.com/JXxgKQh.jpeg',
            titulo:"Sobremesa",
            tipoReceita: "sobremesa",
            desc: "Experimente nossas receitas fáceis de sobremesas! Deliciosas e irresistíveis, perfeitas para adoçar qualquer momento. Descubra novos sabores e experimente hoje mesmo!",
            link: "sobremesa.php"
        }
    ]
    
    iniciaNavegacao = () => {
        var navegacao = document.getElementById('separa');
        itensNavega.map((val) => {
           navegacao.innerHTML += `
           <div class="almoco">
                    <img src="`+val.img+`">
                    <h4>`+val.titulo+`</h4>
                    <p>`+val.desc+`</p>
                    <a href="tipoReceita.php?idTipo=`+val.tipoReceita+`" id="buscar">Buscar</a>
                </div>
           `
        })
    }
    
    iniciaNavegacao();
})