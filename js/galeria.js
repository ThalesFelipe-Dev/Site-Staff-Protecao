
function getDescricao(tipoImg) {
   
    let src = ''

    if (tipoImg == 'a') {
        src = document.getElementById('img_slide').src 
        tipoImg = src.replace(/[^0-9]/g,'');
        tipoImg = parseInt(tipoImg)
        tipoImg = ++tipoImg
        if (tipoImg >= 9) {
            tipoImg =1
        }
        tipoImg = tipoImg.toString()
    }

    if (tipoImg == 'b') {
        src = document.getElementById('img_slide').src
        tipoImg = src.replace(/[^0-9]/g,'');
        tipoImg = parseInt(tipoImg)
        tipoImg = --tipoImg
        tipoImg = tipoImg.toString()
    }

    if (parseInt(tipoImg) > 0 && parseInt(tipoImg) <= 10) {
        switch (tipoImg) {
            case '1':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int1.jpg');
    
                $('#descricao').append("<h2>  Galeria STAFF </h2>"
                +"<p>Na Staff Proteção Veicular você vai encontrar muitos motivos para se tornar um dos "
                +"nossos associados. Somos uma associação séria que sabe valorizar o seu bem, além de uma "
                +"equipe preparada e uma estrutura organizacional sólida capaz de lidar com as mais diversas "
                +"situações dos nossos protegidos. </p>")
                
            break;
            case '2':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int2.jpg');
               
                $('#descricao').append("<h2>   INDENIZAÇÕES </h2>"
                 
                +"<p>A Staff Proteção Veicular zela pelos seus associados, já somamos mais de 5 milhões de "
                +"reais em atendimento entre reparos e indenizações. Somos uma empresa que cumpre seus "
                +"compromissos e jamais deixa sues clientes na mão. Aqui o associado tem a garantia de "
                +"atendimento e da sua proteção, pois somos capazes de fazê-lo. </p>")
                
            break;
            case '3':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int3.jpg');
    
                $('#descricao').append("<h2>  ANTES E DEPOIS </h2>"
                +"<p> Esse é um resultado de muitos que já obtivemos ao longo do nosso trabalho diário, "
                +"nossos colaboradores são eficientes e garantem a qualidade do serviço ofertado, assim, os "
                +"associados Staff terão sempre o melhor resultado quando precisarem de nossa proteção. </p>")
                
            break;
            case '4':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int4.jpg');
    
                $('#descricao').append("<h2>  GUINCHO 24H </h2>"
                +"<p>A Staff Proteção Veicular dispõe de assistência 24h em todo território nacional com "
                +"os melhores colaboradores para sua emergência. Estamos de prontidão para oferecer a você "
                +"todo o suporte necessário no momento de qualquer eventualidade. Dispomos de chaveiros, "
                +"guincho ilimitado e outros serviços. "
                +"</p>")
                
            break;
            case '5':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int5.jpg');
    
                $('#descricao').append("<h2> NOVOS ESCRITÓRIOS </h2>"
                +"<p>A Todos os dias dezenas de novos associados tÊm escolhido fazer parte da Staff "
                +"Proteção Veicular, isso é proveniente dos planos e vantagens oferecidos pela nossa "
                +"proteção e pelo histórico de assistência responsável que temos. Tornar-se um associado staff é a "
                +"melhor decisão para aqueles que zelam pelo seu veículo.</p>")
                
            break;
            case '6':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int6.jpg');
    
                $('#descricao').append("<h2> NOVOS ASSOCIADOS </h2>"
                +"<p>A Staff Proteção Veicular tem associados em várias partes do país e está presente "
                +"em mais de 5 estados. Temos destaques "
                +"na concorrência e estamos em constante crescimento. Somos uma associação sólida e "
                +"responsável que tem construído sua história através do seu compromisso com seus "
                +"associados. E pelo historico de qualidade e excelencia nos atendimentos, tornar-se associado da staff é a melhor decisão para proteger seu veiculo .</p>")
                
            break;
            case '7':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int7.jpg');
            
    
                $('#descricao').append("<h2> SORTEIOS </h2>"
                +"<p>Periodicamente, a Staff proteção veicular oferece aos seus associados, além dos seus "
                +" muitos benefícios, sorteios diversos. Aqui trabalhamos para manter uma boa relação "
                +" com os nossos clientes, tudo que fazemos é pensando no seu bem-estar. </p>")
                
            break;
            case '8':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int8.jpg');
            
    
                $('#descricao').append("<h2> PARCEIROS </h2>"
                +"<p>A Staff proteção veicular mantém parcerias com os melhores colaboradores da área "
                +"de manutenção de veículo, dos simples reparos à grandes transformações. Buscamos sempre o "
                +"melhor para que possamos garantir um serviço de qualidade e alta satisfação por parte de nossos "
                +"associados.</p>")
                
            break;

            case '9':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int9.jpg');
            
    
                $('#descricao').append("<h2> CLUBE CERTO </h2>"
                +"<p>A Staff proteção veicular tem parceria com o Clube Certo, maior clube de descontos "
                +"do Brasil. São milhares de estabelecimentos com descontos e mais de 500 mil produtos e "
                +"serviços disponíveis para nossos associados. </p>")
                
            break;

            case '10':
                $("#descricao").empty();
                $('#img_slide').attr('src', 'images/int10.jpg');
            
    
                $('#descricao').append("<h2> AÇÕES </h2>"
                +"<p>Somos uma empresa dinâmica e estamos em constante movimento. Procuramos estar "
                +"perto do nosso público, assim, podemos ouvir suas reais necessidades e entender seus anseios. "
                +"Desse modo, oferecemos soluções que estão dentro da perspectiva de quem mais importa: o "
                +"nosso associado.</p>")
                
            break;
        }
    }
}