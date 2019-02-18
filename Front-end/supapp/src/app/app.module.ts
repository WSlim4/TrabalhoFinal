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

import { HttpClientModule } from '@angular/common/http';
import { HomeService } from './service/home.service';
import { ConfiguracoesComponent } from './pages/configuracoes/configuracoes.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HomeComponent,
    NavbarComponent,
    AreaPesquisaComponent,
    SobrenosComponent,
    ConfiguracoesComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MaterializeModule,
    FormsModule
  ],
  providers: [
    HttpClientModule,
    HomeService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
