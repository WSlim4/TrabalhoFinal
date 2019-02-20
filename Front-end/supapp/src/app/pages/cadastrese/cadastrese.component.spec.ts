import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CadastreseComponent } from './cadastrese.component';

describe('CadastreseComponent', () => {
  let component: CadastreseComponent;
  let fixture: ComponentFixture<CadastreseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CadastreseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CadastreseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
