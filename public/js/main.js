const helpers = function (){

    
    function mask(obj, func) {
        setTimeout(function() {
          let value = func(obj.value);
          if (value != obj.value) {
            obj.value = value;
          }
        }, 1);
      }

    function mphone(v) {
        let r = v.replace(/\D/g, "");
        r = r.replace(/^0/, "");
        if (r.length > 10) {
          r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (r.length > 5) {
          r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (r.length > 2) {
          r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
          r = r.replace(/^(\d*)/, "($1");
        }
        return r;
    }

    function setAddress(address){
        let field = document.querySelector('#user_address');
        field.value = address;
    } 

    function sendAddress(e){
        if(e.target.value.length === 8){
            fetch(`/users/address/${e.target.value}`)
            .then(response => response.json())
            .then(data => {
                let {logradouro, bairro, localidade, uf} = data;
                setAddress(`${logradouro}, ${bairro} - ${localidade} - ${uf}`);
            });
        }
        else setAddress('');
    }

    function deleteUser(e) {
        if(confirm('Deseja mesmo excluir este usuário?')){
            window.location = `users/delete/${e.target.value}`;
        }
    }

    return { mask, mphone, sendAddress, deleteUser };
}();

window.onload = function() {
    const cepField = document.querySelector('#user_cep');
    if(cepField && cepField.value){
        cepField.dispatchEvent(new Event('keyup'));
    }
};