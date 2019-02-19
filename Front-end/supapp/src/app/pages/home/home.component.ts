import { Component, OnInit } from '@angular/core';
import { HomeService } from '../../service/home.service'

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  clicked: boolean = false;
  tipoPesquisa: string = "nome";
  nomeInput: string = "brasil";

  constructor( public homeService: HomeService ) { }

  ngOnInit() {

  }
  onSubmit(){
    if( this.tipoPesquisa == "nome"){
      console.log( this.nomeInput );
    }
  }
  onClick(){
    this.clicked=!this.clicked;
  }

}
