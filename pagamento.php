<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Aura Prateada</title>
    <link rel="stylesheet" href="Visao/CSS/estilo.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AcFiCrwGPr-vINy0g-S1xVUxvKS2DsWSlmzQKNjgKAbrpaCd0IkRIUoJrPpNkSSX8cgO3pTBImyNlCAZ&currency=BRL"></script>
</head>
<body>
    <div class="carrinho">
        <h2>Pagamento</h2>
        <div id="itens-carrinho">
        </div>
        <p>Total: R$ <span id="total">0.00</span></p>
        <div id="paypal-button-container"></div>
    </div>

    <script src="Modelo/carrinho.js"></script>
    <script>
        function carregarItensCarrinho() {
            const itensCarrinho = document.getElementById('itens-carrinho');
            const totalElemento = document.getElementById('total');

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
                    `;
                    itensCarrinho.appendChild(itemDiv);
                    total += item.preco * item.quantidade;
                });
            }

            totalElemento.textContent = total.toFixed(2);
            return total.toFixed(2);
        }

        function configurarPaypal() {
            const total = carregarItensCarrinho(); 

            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: total 
                            },
                            description: "Compra de produtos - Aura Prateada",
                            items: carrinho.map(item => ({
                                name: item.nome,
                                unit_amount: { value: item.preco.toFixed(2), currency_code: 'BRL' },
                                quantity: item.quantidade
                            }))
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Pagamento concluído com sucesso, ' + details.payer.name.given_name + '!');
                        finalizarCompra();
                    });
                }
            }).render('#paypal-button-container');
        }
        document.addEventListener("DOMContentLoaded", function() {
            configurarPaypal();
        });
    </script>
</body>
</html>