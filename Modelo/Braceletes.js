const braceletes = [
    {
        name: "Bracelete Raizes de Amor",
        price: 130,
        Image:"Visao/imagem/BraceleteRaizesdeAmor.png"
    },
    {
        name: "Bracelete Lua Azul",
        price: 135.90,
        image: "Visao/imagem/BraceleteLuaAzul.png"
    },
    {
        name: "Bracelete Estrela",
        price: 299,
        image: "Visao/imagem/BraceleteEstrela.png"
    },
    {
        name: "Bracelete Mickey",
        price: 300,
        image: "Visao/imagem/BraceleteMickey.png"
    }
];
const productList = document.getElementById('product-list');
braceletes.forEach(bracelete => {
    const productDiv = document.createElement('div');
    productDiv.classList.add('produto');

    productDiv.innerHTML = `
        <img src="${bracelete.image}" alt="${bracelete.name}">
        <h3>${bracelete.name}</h3>
        <p><strong>R$${bracelete.price}</strong></p>
    `;

    productList.appendChild(productDiv);
});
