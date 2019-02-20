import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { MaterializeModule } from 'angular2-materialize';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './pages/login/login.component';

import { FormsModule } from '@angular/forms';
import { HomeComponent } from './pages/home/home.component';
import { NavbarComponent } from './navbar/navbar.component';
import { AreaPesquisaComponent } from './pages/area-pesquisa/area-pesquisa.component';
import { SobrenosComponent } from './pages/sobrenos/sobrenos.component';

import { HttpClientModule, HttpClient } from '@angular/common/http';
import { HomeService } from './service/home.service';
import { ConfiguracoesComponent } from './pages/configuracoes/configuracoes.component';
import { CadastreseComponent } from './pages/cadastrese/cadastrese.component';
import { CadastroEmpresaComponent } from './pages/cadastro-empresa/cadastro-empresa.component';
import { CadastroClienteComponent } from './pages/cadastro-cliente/cadastro-cliente.component';
import { FaltaLoginComponent } from './pages/falta-login/falta-login.component';
import { ProdutosComponent } from './pages/produtos/produtos.component';
import { PedidosComponent } from './pages/pedidos/pedidos.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HomeComponent,
    NavbarComponent,
    AreaPesquisaComponent,
    SobrenosComponent,
    ConfiguracoesComponent,
    CadastreseComponent,
    CadastroEmpresaComponent,
    CadastroClienteComponent,
    FaltaLoginComponent,
    ProdutosComponent,
    PedidosComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    MaterializeModule,
    FormsModule
  ],
  providers: [
    HttpClientModule,
    HttpClient,
    HomeService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
