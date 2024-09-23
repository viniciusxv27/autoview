<div class="main-content" id="main-content">
    <div class="card" style="width: 28rem;">
        <div class="card-body">
            <h5 class="card-title"><i class="ph ph-user"></i> Conta</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Detalhes de sua conta e plano</h6>
            <br>
            <p class="card-text"><b>Nome:</b> <?php echo session()->user; ?></p>
            <p class="card-text"><b>Email:</b> <?php echo session()->email; ?></p>
            <p class="card-text"><b>Plano:</b>
                <?php if (session()->assinatura >= 1) { ?>
                    Premium
                <?php } else { ?>
                    Gratuito
                <?php } ?>
            </p>
            <a href="<?php echo base_url('token'); ?>" class="card-link"><i class="ph ph-password"></i> Ver Token</a>
            <div class="mt-3">
                <button id="info-button" class="btn btn-primary">Alterar Informações</button>
                <button id="cancel-button" class="btn btn-secondary">Cancelar Assinatura</button>
            </div>
        </div>
    </div>
    <?php if (session()->get('assinatura') === '0') { ?>

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

    <script>
        document.getElementById('info-button').addEventListener('click', function() {
            window.location.href = '<?php echo base_url('alterar_informacoes'); ?>';
        });

        document.getElementById('cancel-button').addEventListener('click', function() {
            var r = confirm("Deseja realmente cancelar sua assinatura?");
            if (r == true) {
                fetch('<?php echo base_url('api/cancelar_assinatura'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            sub_id: '<?php echo session()->assinatura_id; ?>'
                        })
                    }).then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        window.location.reload();
                    });
            }
        });
    </script>


</div>