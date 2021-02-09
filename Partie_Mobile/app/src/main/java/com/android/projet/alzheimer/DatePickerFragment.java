package com.android.projet.alzheimer;

import android.app.DatePickerDialog;
import android.app.Dialog;
import android.os.Bundle;
import android.app.DialogFragment;

import java.util.Calendar;

/**
 * Created by said on 6/16/2018.
 */

public class DatePickerFragment extends DialogFragment {
    Calendar calendar=Calendar.getInstance();
    int year = calendar.get(Calendar.YEAR);
    int month = calendar.get(Calendar.MONTH);
    int day =calendar.get(Calendar.DAY_OF_MONTH);
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        return  new DatePickerDialog(getActivity(),(DatePickerDialog.OnDateSetListener) getActivity(),year,month,day);
    }
}