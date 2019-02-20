import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  passwordError: boolean;

  constructor() { }

  ngOnInit() {
  }

  onSubmit(login){
    console.log(login)
  }

  passwordCheck(senha){
  	if(senha.value.length < 6){
  		this.passwordError = true;
  	}else{
  		this.passwordError = false;
  	}
  }

}
