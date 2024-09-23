<div class="main-content" id="main-content">
    <?php if (session()->get('assinatura') === '1' || session()->get('assinatura') === '2') { ?>

        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="ph ph-password"></i> Auth Token</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Requisições feitas do seu Token</h6>
                <br>
                <div class="card token-card">
                    <p class="placeholder"><?php echo session()->token; ?></p>
                </div>
                <button onclick="hiddenToken()" class="hidden-token btn btn-primary"><i id="eye-icon" class="ph ph-eye"></i> Mostrar Token </button>

                <button onclick="alterToken(<?php echo session()->id; ?>)" class="alter-token btn btn-warning"><i id="eye-icon" class="ph ph-repeat"></i> Mudar Token </button>

                <br>
                <br>

                <a href="<?php echo base_url('docs'); ?>">Como usar?</a>
            </div>
        </div>

        <style>
            .token-card p {
                transition: all 0.3s ease;
            }

            .placeholder {
                border-radius: 10px;
            }
        </style>

        <script>
            var tokenCard = document.querySelector('div.token-card p');

            function hiddenToken() {
                var token = document.querySelector('.hidden-token');

                if (tokenCard.className === 'placeholder') {
                    tokenCard.className = '';
                    token.innerHTML = '<i class="ph ph-eye-closed"></i> Esconder Token';

                } else {
                    tokenCard.className = 'placeholder';
                    token.innerHTML = '<i class="ph ph-eye"></i> Mostrar Token';
                }
            }

            function alterToken(id) {
                var token = gerarTokenAleatorio();

                $.ajax({
                    url: '<?php echo base_url("api/alterar_token") ?>',
                    type: 'POST',
                    data: {
                        token: token,
                        token_antigo: '<?php echo session()->token ?>',
                        id: id
                    },
                    success: function(response) {
                        if (response['message'] == 'Token trocado') {
                            tokenCard.textContent = token;
                        }
                    },
                    error: function(error) {
                        console.log('Erro:', error);
                    }
                });
            }

            function gerarTokenAleatorio() {
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var token = '';

                for (var i = 0; i < 31; i++) {
                    token += characters.charAt(Math.floor(Math.random() * characters.length));
                }

                return token;
            }
        </script>

    <?php } else { ?>

        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="ph ph-star"></i> Tenha Acesso Completo!</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Acesso ilimitado a todos os veiculos</h6>
                <br>
                <p class="card-text">Aproveite todas as funcionalidades da api mais completa de Veiculos com visualização 3D.</p>
                <div style="display: flex; justify-content:center; align-items: center; width: 100%;">
                    <stripe-buy-button
                        buy-button-id="buy_btn_1PvrfvHBn7GJcEdF4gMfrILC"
                        publishable-key="pk_live_51O7kFlHBn7GJcEdFZqoUid0qBvgoLuCovROYv0nIt43mkSK6LoeTufLbGwiAviu0o1mQefj5UQ6pf30CSsKG8xMb00OiFRCc2o">
                    </stripe-buy-button>
                </div>
            </div>
        </div>

        <script async
            src="https://js.stripe.com/v3/buy-button.js">
        </script>

    <?php } ?>

</div>