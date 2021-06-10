import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DuplicadoComponent } from './duplicado.component';

describe('DuplicadoComponent', () => {
  let component: DuplicadoComponent;
  let fixture: ComponentFixture<DuplicadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DuplicadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DuplicadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
