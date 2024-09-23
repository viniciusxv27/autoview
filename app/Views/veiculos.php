<?php if (session()->get('assinatura') === '0') { ?>
    <div class="main-content" id="main-content">
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
    </div>

<?php } else { ?>
    <div class="container">

        <div class="second-content" id="second-content">
            <h1><i class="ph ph-car "></i> <i class="ph ph-motorcycle"></i> <i class="ph ph-truck"></i> <i class="ph ph-jeep"></i></h1>
            <div>
                <input type="text" id="search" class="search" placeholder="Buscar Veiculo">
            </div>
        </div>
        <div class="main-content" id="main-content">

            <?php foreach ($veiculos as $veiculo) { ?>

                <div class="card" style="width: 21rem;">
                    <?= $veiculo['link'] ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $veiculo['nome'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">ID: <?= $veiculo['id'] ?></h6>
                        <br>
                        <a href="<?php echo base_url('veiculo/' . $veiculo['id']) ?>" class="btn btn-primary">Ver Mais</a>
                    </div>
                </div>

            <?php } ?>

            <style>
                iframe {
                    width: 100%;
                    border-radius: 10px;
                }

                .main-content {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                    gap: 20px;
                    flex: 1;
                    background-color: #ecf0f1;
                    padding: 20px;
                    box-sizing: border-box;
                    margin-left: 250px;
                    transition: margin-left 0.3s ease;
                }

                .second-content {
                    display: flex;
                    flex-direction: column;
                    gap: 20px;
                    background-color: #ecf0f1;
                    padding: 20px;
                    box-sizing: border-box;
                    margin-left: 250px;
                    transition: margin-left 0.3s ease;
                }

                .search {
                    width: 50%;
                    padding: 10px;
                    border-radius: 10px;
                    border: 1px solid #bdc3c7;
                }

                .search:focus {
                    outline: none;
                }
            </style>

            <script>
                document.getElementById('search').addEventListener('input', function() {
                    var searchValue = this.value.toLowerCase();
                    var cards = document.getElementsByClassName('card');

                    for (var i = 0; i < cards.length; i++) {
                        var cardTitle = cards[i].getElementsByClassName('card-title')[0].innerText.toLowerCase();
                        if (cardTitle.includes(searchValue)) {
                            cards[i].style.display = 'block';
                        } else {
                            cards[i].style.display = 'none';
                        }
                    }
                });
            </script>

        </div>
    </div>
<?php } ?>