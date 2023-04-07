function formatarCPF(campo) {
    var valor = campo.value.replace(/\D/g, "");
    valor = valor.replace(/^(\d{3})(\d)/g, "$1.$2");
    valor = valor.replace(/^(\d{3})\.(\d{3})(\d)/g, "$1.$2.$3");
    valor = valor.replace(
        /^(\d{3})\.(\d{3})\.(\d{3})(\d{1,2})/g,
        "$1.$2.$3-$4"
    );
    campo.value = valor;
}
