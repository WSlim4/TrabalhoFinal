import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cadastro-empresa',
  templateUrl: './cadastro-empresa.component.html',
  styleUrls: ['./cadastro-empresa.component.css']
})
export class CadastroEmpresaComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  onSubmit(cadastroEmpresa){
    console.log(cadastroEmpresa)
  }

}
