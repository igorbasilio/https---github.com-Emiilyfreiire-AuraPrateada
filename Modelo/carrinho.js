let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

function salvarCarrinho() {
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    updateCartCount(); 
}

document.addEventListener("DOMContentLoaded", function () {
    atualizarCarrinho();
});

function adicionarAoCarrinho(nome, preco) {
    const itemExistente = carrinho.find(item => item.nome === nome);

    if (itemExistente) {
        itemExistente.quantidade++;
    } else {
        carrinho.push({ nome, preco, quantidade: 1 });
    }

    salvarCarrinho();
    atualizarCarrinho();
}

function removerItem(nome) {
    const item = carrinho.find(item => item.nome === nome);

    if (item) {
        const itemCount = parseInt(localStorage.getItem('cartItemCount')) || 0;
        const newItemCount = itemCount - item.quantidade; 
        localStorage.setItem('cartItemCount', newItemCount);

        carrinho = carrinho.filter(item => item.nome !== nome);

        salvarCarrinho(); 
        atualizarCarrinho(); 
    }
}

function atualizarQuantidade(nome, delta) {
    const item = carrinho.find(item => item.nome === nome);
    if (item) {
        item.quantidade += delta;
        if (item.quantidade <= 0) {
            removerItem(nome); 
        } else {
            salvarCarrinho(); 
            atualizarCarrinhoVisual(); 
        }
    }
}

function atualizarCarrinho() {
    const itensCarrinho = document.getElementById('itens-carrinho');
    const totalElemento = document.getElementById('total');

    if (!itensCarrinho || !totalElemento) return;

    itensCarrinho.innerHTML = '';
    let total = 0;

    if (carrinho.length === 0) {
        itensCarrinho.innerHTML = '<p>O carrinho está vazio.</p>';
    } else {
        carrinho.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('item-carrinho');
            itemDiv.innerHTML = `
                <span>${item.nome} (x${item.quantidade})</span>
                <span>R$ ${(item.preco * item.quantidade).toFixed(2)}</span>
                <button onclick="atualizarQuantidade('${item.nome}', -1)">-</button>
                <button onclick="atualizarQuantidade('${item.nome}', 1)">+</button>
                <button onclick="removerItem('${item.nome}')">Excluir</button>
            `;
            itensCarrinho.appendChild(itemDiv);
            total += item.preco * item.quantidade;
        });
    }

    totalElemento.textContent = total.toFixed(2);
}

function finalizarCompra() {
    alert("Compra finalizada com sucesso!");
    carrinho = [];
    salvarCarrinho();
    atualizarCarrinho();
}

const cartCount = document.querySelector('.cart-count');

function updateCartCount() {
    const itemCount = carrinho.reduce((total, item) => total + item.quantidade, 0);
    if (cartCount) {
        cartCount.textContent = itemCount; 
    }
}

function addToCart() {
    let itemCount = parseInt(localStorage.getItem('cartItemCount')) || 0;
    itemCount += 1;
    localStorage.setItem('cartItemCount', itemCount);
    updateCartCount();
}

function removeFromCart() {
    let itemCount = parseInt(localStorage.getItem('cartItemCount')) || 0;
    if (itemCount > 0) {
        itemCount -= 1;
        localStorage.setItem('cartItemCount', itemCount);
        updateCartCount();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    updateCartCount();

    const addToCartButtons = document.querySelectorAll('.add-carrinho');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    const removeFromCartButtons = document.querySelectorAll('.remove-carrinho');
    removeFromCartButtons.forEach(button => {
        button.addEventListener('click', removeFromCart);
    });
});






function adicionarAoCarrinho(nome, preco, imagem) {
    const itemExistente = carrinho.find(item => item.nome === nome);

    if (itemExistente) {
        itemExistente.quantidade += 1;
    } else {
        carrinho.push({
            nome,
            preco,
            imagem,
            quantidade: 1
        });
    }

    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    atualizarCarrinhoVisual();
}

function atualizarCarrinhoVisual() {
    const itensCarrinho = document.getElementById("itens-carrinho");
    const totalElement = document.getElementById("total");
    const promocaoElement = document.getElementById("promocao");

    itensCarrinho.innerHTML = ""; 

    let total = 0;
    let braceleteAdicionado = false;

    if (totalCarrinho() < 899) {
        
        carrinho = carrinho.filter(item => item.nome !== "Bracelete");
    }

    carrinho.forEach(item => {
        const itemElement = document.createElement("div");
        itemElement.classList.add("item-carrinho");

        let precoItem = item.preco * item.quantidade;
        if (item.nome === "Bracelete") {
            precoItem = "Brinde"; 
            braceleteAdicionado = true; 
        }

        itemElement.innerHTML = `
            <img src="${item.imagem}" alt="${item.nome}" class="imagem-produto-carrinho">
            <div>
                <p>${item.nome}</p>
                <p>Quantidade: 
                    <button onclick="alterarQuantidade('${item.nome}', -1)">-</button>
                    ${item.quantidade}
                    <button onclick="alterarQuantidade('${item.nome}', 1)">+</button>
                </p>
                <p>Preço: R$ ${precoItem}</p>  <!-- Exibe preço como 'Brinde' se for o bracelete -->
            </div>
        `;


        if (item.nome !== "Bracelete") {
            total += item.preco * item.quantidade;
        }

        itensCarrinho.appendChild(itemElement);
    });

    totalElement.textContent = total.toFixed(2);

    if (total >= 899) {
        const braceleteExistente = carrinho.find(item => item.nome === "Bracelete");
        if (!braceleteExistente) {
            carrinho.push({
                nome: "Bracelete",
                preco: 0,  
                imagem: "imagens/bracelete.jpg", 
                quantidade: 1
            });

            localStorage.setItem("carrinho", JSON.stringify(carrinho));
            atualizarCarrinhoVisual();
        }

        promocaoElement.textContent = "🎉 GANHE UM BRACELETE GRÁTIS! 🎉\nNas suas compras a partir de R$899,00";
    } else {
        
        promocaoElement.textContent = "";
    }
}

function totalCarrinho() {
    let total = 0;
    carrinho.forEach(item => {
        if (item.nome !== "Bracelete") {
            total += item.preco * item.quantidade;
        }
    });
    return total;
}

function alterarQuantidade(nome, quantidadeAlterada) {
    const item = carrinho.find(item => item.nome === nome);
    if (item) {
        item.quantidade += quantidadeAlterada;
        if (item.quantidade <= 0) {
            carrinho = carrinho.filter(item => item.nome !== nome);
        }
        localStorage.setItem("carrinho", JSON.stringify(carrinho));
        atualizarCarrinhoVisual();
    }
}
document.addEventListener("DOMContentLoaded", atualizarCarrinhoVisual);