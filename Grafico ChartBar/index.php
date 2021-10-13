<?php
    include 'conexao/conexao.php';

    $sql = "SELECT * FROM lucros";
    $buscar = mysqli_query($conexao, $sql);

    #chart.js - Preparando valores #
    
    $mes = '';
    $ano_2018 = '';
    $ano_2019 = '';

    while ($dados = mysqli_fetch_array($buscar)) {
     
    $mes = $mes . '"' . $dados['mes'] . '",';
    $ano_2018 = $ano_2018 . '"' . $dados['ano_2018'] . '",';
    $ano_2019 = $ano_2019 . '"' . $dados['ano_2019'] . '",';

    # trim() - tira os espaços da variável
    $mes = trim($mes); 
    $ano_2018 = trim($ano_2018);
    $ano_2019 = trim($ano_2019);

    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script> 
    <link rel="stylesheet" href="css/bootstrap.css" />

    <title>Gráfico Barra</title>
</head>
<body>

    <div class="container" style=" position: absolute; background-color: #cecece; margin-top: 50px;">
        <div class="canvas">
             <canvas id="myChart"></canvas>
        </div>
    </div>
    
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
               type: 'bar',
               data: {
                    labels:[<?php echo $mes ?>],
                    datasets:
                    [{  
                        label: '2018', // Nome da Legenda
                        data: [<?php echo $ano_2018 ?>],
                        // Cor da Legenda
                        backgroundColor: 'rgba(255, 99, 132)',
                        borderColor: 'rgba(255, 99, 132)',
                        // Tamanho da borda
                        borderWidth: 1,
                        pointBackgroundColor: 'rgba(255, 99, 132)'
                    }, 
                    {
                        label: '2019',
                        data: [<?php echo $ano_2019 ?>],
                        // Cor da Legenda
                        backgroundColor: 'rgba(105, 255, 132)',
                        borderColor: 'rgba(105, 255, 132)',
                        // Tamanho da borda
                        borderWidth: 1,
                        pointBackgroundColor: 'rgba(105, 255, 132)',
                    }]
               },
               
               // Configurações para Gráficos de Linha
               options: { 
					legend: {
						labels: {
							fontColor: "white",
							fontSize: 14
						}
					},
					scales: {
						xAxes: [{ 
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Meses',
								fontColor:'#ffffff',
								fontSize:16
							},
							ticks: {
								fontColor: "white",
								fontSize: 14	
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Valores',
								fontColor: '#ffffff',
								fontSize:14
							},
							ticks: {
								fontColor: "white",
								fontSize: 14
							}
						}]
					}
				}
            
        }); 

    </script>

    <script src="../node_modules/./chart.js/./dist/chart.js"></script>
    <script src="../01-Dashboard em Chart.js/js/bootstrap.bundle.js"></script>
    <script src="../01-Dashboard em Chart.js/js/Jquery 3.6.js"></script>
</body>
</html>