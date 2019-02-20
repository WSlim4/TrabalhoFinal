import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  clicked: boolean = false;

  constructor() { }

  ngOnInit() {
  }
  onClick(){
    this.clicked=!this.clicked;
  }

}
