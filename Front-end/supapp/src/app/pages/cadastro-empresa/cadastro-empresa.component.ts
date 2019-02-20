import { Component, OnInit } from '@angular/core';
import { CadastroEmpresaService } from '../../service/cadastro-empresa.service';

@Component({
  selector: 'app-cadastro-empresa',
  templateUrl: './cadastro-empresa.component.html',
  styleUrls: ['./cadastro-empresa.component.css']
})
export class CadastroEmpresaComponent implements OnInit {

  passwordError: boolean = false;
  numberError: boolean = false;
  cnpjError: boolean = false;
  suppliers: any[] = [];

  constructor(private EmpresaService: CadastroEmpresaService) { }

  ngOnInit() {
  }

  onSubmit(cadastroEmpresa){
    console.log(cadastroEmpresa)
  }

  checkPassword(senha){
    if(senha.value.length < 6){
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
    if( cnpj.value.length != 18 ){
      this.cnpjError = true;
    }else{
      this.cnpjError = false;
    }
  }

  save(cadastroEmpresa){
    let supplier = cadastroEmpresa.value;
    this.EmpresaService.addsupplier(supplier).subscribe(
      res => {
        this.suppliers.push({
          name: supplier.nome,
          password: supplier.senha,
          c_password: supplier.senha,
          email: supplier.email,
          phone: supplier.telefone,
          address: supplier.endereco,
          cnpj: supplier.cnpj
        })
      }
    );
  }

}
