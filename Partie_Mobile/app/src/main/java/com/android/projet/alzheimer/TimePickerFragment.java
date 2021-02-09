package com.android.projet.alzheimer;

import android.app.Dialog;
import android.app.DialogFragment;
import android.app.TimePickerDialog;
import android.os.Bundle;
import android.text.format.DateFormat;

import java.util.Calendar;

/**
 * Created by said on 6/16/2018.
 */

public class TimePickerFragment extends DialogFragment {
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        Calendar calendar = Calendar.getInstance();
        int hour = calendar.get(Calendar.HOUR_OF_DAY);
        int minute = calendar.get(Calendar.MINUTE);

        return new TimePickerDialog(getActivity(),(TimePickerDialog.OnTimeSetListener) getActivity(),hour,minute, DateFormat.is24HourFormat(getActivity()));

    }
}
