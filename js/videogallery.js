function getListCideo(tipoBtn) {

        let array1 = [
            'https://www.youtube.com/embed/pUEitNLQQOI',
            'https://www.youtube.com/embed/pUEitNLQQOI',
            'https://www.youtube.com/embed/pUEitNLQQOI'
        ]

        let array2 = [
            'https://www.youtube.com/embed/pUEitNLQQOI',
            'https://www.youtube.com/embed/pUEitNLQQOI',
            'https://www.youtube.com/embed/pUEitNLQQOI',
        ]
        
        let array3 = [
            'https://www.youtube.com/embed/pUEitNLQQOI',
            'https://www.youtube.com/embed/pUEitNLQQOI',
            'https://www.youtube.com/embed/pUEitNLQQOI',
        ]

        switch (tipoBtn) {
            case 'tipo1':
                $("#playList").empty();
                for (let i = 0; i < array1.length; i++) {
                    $('#playList').append("<iframe width='390' height='250'" 
                    +"src='"+array1[i]+"' frameborder='8'"
                    +"allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' "
                    +"allowfullscreen></iframe>")
                }
            break;
            case 'tipo2':
                $("#playList").empty();
                for (let i = 0; i < array2.length; i++) {
                    $('#playList').append("<iframe width='390' height='250'" 
                    +"src='"+array2[i]+"' frameborder='8'"
                    +"allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'"
                    +"allowfullscreen></iframe>")
                }
            break;
            case 'tipo3':
                $("#playList").empty();
                for (let i = 0; i < array3.length; i++) {
                    $('#playList').append("<iframe width='390' height='250'" 
                    +"src='"+array3[i]+"' frameborder='8'"
                    +"allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'"
                    +"allowfullscreen></iframe>")
                }
            break;
        }
}
