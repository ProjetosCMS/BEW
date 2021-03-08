<?php
class SaleView {
    public function __construct($params) {
        $env = parse_ini_file('env.ini')['HOST'];
?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/public/css/sale.css">
            <title>Consultar vendas</title>
            <script>
                const host =  '<?php echo $env; ?>';
            </script>
        </head>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>

        <body>
        <?php include "components/Sidebar.php" ?>
        <main class="wide">
            <header>
                <i class="menu-toggle" data-feather="menu"></i>
                <div class="header-conteudo">
                    <h1>CONSULTAR VENDA</h1>
                    <div class="botoesDireito">
                        <a href="/add/sale" class="btnAddVenda">Adicionar venda<i data-feather="plus"></i></a>
                        <form action="" class="pesquisar">
                            <input type="search" name="pesquisar" id="" placeholder="Pesquisar na tabela">
                            <button type="submit"><i data-feather="search"></i></button>
                        </form>
                    </div>
                </div>
            </header>
            <div class="content">
                <table class="tabela-vendas">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Quantidade de itens</td>
                            <td>Valor</td>
                            <td>Cliente</td>
                            <td>Forma de pagamento</td>
                            <td>Data de venda</td>
                            <td>Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params['sales'] as $sale) { ?>
                            <tr>
                                <td><?php echo $sale['idVenda']; ?></td>
                                <td><?php echo $sale['quantidade']; ?></td>
                                <td><?php echo $sale['valor']; ?></td>
                                <td><?php echo $sale['nomeCliente']; ?></td>
                                <td><?php echo $sale['formaPagamento']; ?></td>
                                <td><?php echo $sale['dataVenda']; ?></td>
                                <td><button type="button" class="abrir-modal" onclick="consultarVenda(<?php echo $sale['idVenda']; ?>)">
                                    <i data-feather="search"></i></button>
                                </td>
                            </tr>
                            <div class="modal disabled">
                                <div class="venda">
                                    <button type="button" class="fechar-modal">
                                        <i data-feather="x"></i>
                                    </button>
                                    <div class="conteudoVenda"></div>
                                    <a href="" class="btnEditar">Editar<i data-feather="edit"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
        </body>

    <script src="/public/js/global.js"></script>
    <script src="/public/js/SaleFunctions.js"></script>

    </html>
<?php   }
    }
?>
