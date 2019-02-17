import { MaterializeAction } from "angular2-materialize";
import { Component, OnInit, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-area-pesquisa',
  templateUrl: './area-pesquisa.component.html',
  styleUrls: ['./area-pesquisa.component.css']
})
export class AreaPesquisaComponent implements OnInit {

  modalActions = new EventEmitter<string|MaterializeAction>();

  constructor() { }

  ngOnInit() {
  }
  abreModal(){
    this.modalActions.emit({action:"modal", params: ['open']});
  }
  fecharModal(){
    this.modalActions.emit({action:"modal", params:['close']});
  }
}
