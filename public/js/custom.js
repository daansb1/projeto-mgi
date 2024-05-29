import Swal from "sweetalert2";

function confirmarExclusao(event, contaId){

    event.preventDefault();

    Swal.fire({
        title: 'Tem certeza?',
        text: 'Você não poderá reverter isso!',
        icon: 'warning',
    });

}
