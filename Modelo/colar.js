const colares = [
    {
        name: "Colar Lua Arvore",
        price: 255.90,
        Image: "Visao/imagem/ColarLuaArvoredaVida.png" 
    },
    {
        name:"Corrente Mini",
        price: 100,
        image: "Visao/imagem/ColarMiniCoracoes.png"
    },
    {
        name: "Colar Prata",
        price: 250,
        image: "Visao/imagem/ColarPrataDoisCoracoes.png"
    },
    {
        name: "Colar Prata Pigente",
        price: 279.99,
        image: "Visao/imagem/ColarPrataPingente.png"
    }
];
const productList = document.getElementById('product-list');
colares.forEach(colares => {
    const productDiv = document.createElement('div');
    productDiv.classList.add('produto');

    productDiv.innerHTML = `
        <img src="${colares.image}" alt="${colares.name}">
        <h3>${colares.name}</h3>
        <p><strong>R$${colares.price}</strong></p>
    `;

    productList.appendChild(productDiv);
});
