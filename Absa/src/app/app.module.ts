import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

//Rutas para moverse entre ventanas

import { AppComponent } from './app.component';
import { LoginFormComponent } from './components/login-form/login-form.component';
import { SignupFormComponent } from './components/signup-form/signup-form.component';
import { MainPageComponent } from './components/main-page/main-page.component';
import { RouterModule, Routes } from '@angular/router';

const rutas: Routes = [
  {
    path: '', pathMatch:'full', redirectTo:  'MainPage'
  },
  {
    path: 'MainPage', component: MainPageComponent,
    children: [   
      {
        path: 'SignupForm', component: SignupFormComponent
      },
      {
        path: 'LoginForm', component: LoginFormComponent
      }
    ]
  },
  {
    path: 'SignupForm', component: SignupFormComponent
  },
  {
    path: 'LoginForm', component: LoginFormComponent
  }
]

@NgModule({
  declarations: [
    AppComponent,
    LoginFormComponent,
    SignupFormComponent,
    MainPageComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(rutas, {
      enableTracing: true, //para un mejor debug

    })
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
