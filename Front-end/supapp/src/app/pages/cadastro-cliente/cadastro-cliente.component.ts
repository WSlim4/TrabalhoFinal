import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cadastro-cliente',
  templateUrl: './cadastro-cliente.component.html',
  styleUrls: ['./cadastro-cliente.component.css']
})
export class CadastroClienteComponent implements OnInit {

  passwordError: boolean = false;
  numberError: boolean = false;
  cnpjError: boolean = false;

  constructor() { }

  ngOnInit() {
  }

  onSubmit(cadastroCliente){
    console.log(cadastroCliente);
  }

  checkPassword(senha){
    if(senha.value.length < 6 ){
      this.passwordError = true;
    }else{
      this.passwordError = false;
    }
  }
  checkNumber(telefone){
    if(telefone.value.length < 8){
      this.numberError = true;
    }else{
      this.numberError = false;
    }
  }

  checkCnpj(cnpj){
    if(cnpj.value.length != 14){
      this.cnpjError = true;
    }else{
      this.cnpjError = false;
    }
  }

}
