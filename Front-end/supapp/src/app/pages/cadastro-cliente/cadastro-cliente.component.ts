import { Component, OnInit } from '@angular/core';
import { CadastroCostumerService } from '../../service/cadastro-costumer.service'

@Component({
  selector: 'app-cadastro-cliente',
  templateUrl: './cadastro-cliente.component.html',
  styleUrls: ['./cadastro-cliente.component.css']
})
export class CadastroClienteComponent implements OnInit {

  passwordError: boolean = false;
  numberError: boolean = false;
  cnpjError: boolean = false;
  costumers: any[] = [];

  constructor(private CostumerService: CadastroCostumerService) { }

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

  save(cadastroCliente){
    let costumer = cadastroCliente.value;
    this.CostumerService.addCostumer(costumer).subscribe(
      res => {
        this.costumers.push({
          name: costumer.nome,
          password: costumer.senha,
          c_password: costumer.senha,
          email: costumer.email,
          phone: costumer.telefone,
          address: costumer.endereco,
          cnpj: costumer.cnpj
        })
      }
    );
  }

}
