<div class="main-content" id="main-content">

    <?php if (session()->get('assinatura') === '1' || session()->get('assinatura') === '2') { ?>

        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="ph ph-path"></i> Requisições</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Requisições feitas do seu Token</h6>
                <br>
                <div class="card">
                    <h3><?php echo $requisicoes ?></h3>
                </div>
                <a href="<?php echo base_url('token'); ?>" class="card-link"><i class="ph ph-password"></i> Ver Token</a>
            </div>
        </div>

    <?php } ?>

    <?php if (session()->get('assinatura') === '2') { ?>

        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <h5 class="card-title"><i class="ph ph-currency-dollar"></i> Assinaturas Mensais</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Quantidade de Assinantes e Faturamento Mensal</h6>
                <br>
                <div class="card">
                    <h3><?php echo $assinantes ?> | R$<?php echo $assinantes * 149.90 ?></h3>
                </div>
            </div>
        </div>

    <?php } ?>

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
</div>