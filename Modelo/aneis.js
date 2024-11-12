const aneis = [
    {
        name: "Anel Prata Corações",
        price: 150,
        image: "Visao/imagem/AnelPrataCorações.png"
    },
    {
        name: "Anel Prata Cruzadas",
        price: 299.99,
        image: "Visao/imagem/AnelPrataCruzadas.png"
    },
    {
        name: "Anel Prata Diabo",
        price: 190,
        image: "Visao/imagem/AnelPrataDiabo.png"
    },
    {
        name: "Anel Prata Diamantes",
        price: 279.99,
        image: "Visao/imagem/AnelPrataDiamantes.png" 
    }
];
const productList = document.getElementById('product-list');
aneis.forEach(anel => {
    const productDiv = document.createElement('div');
    productDiv.classList.add('produto');

    productDiv.innerHTML = `
        <img src="${anel.image}" alt="${anel.name}">
        <h3>${anel.name}</h3>
        <p><strong>R$${anel.price}</strong></p>
    `;

    productList.appendChild(productDiv);
});
