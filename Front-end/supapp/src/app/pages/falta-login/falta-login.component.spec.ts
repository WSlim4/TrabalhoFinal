import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FaltaLoginComponent } from './falta-login.component';

describe('FaltaLoginComponent', () => {
  let component: FaltaLoginComponent;
  let fixture: ComponentFixture<FaltaLoginComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FaltaLoginComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FaltaLoginComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
