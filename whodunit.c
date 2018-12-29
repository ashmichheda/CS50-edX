/**
 * copy.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece, just because.
 */
       
#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: whodunit cluefile\n");
        return 1;
    }


    // open input file 
    FILE* clue_ptr = fopen(argv[1], "r");
    if (clue_ptr == NULL)
    {
        printf("Could not open %s.\n", argv[1]);
        return 2;
    }

    // open output file
    FILE* solution_ptr = fopen("solution.bmp", "w");
    if (solution_ptr == NULL)
    {
        fclose(clue_ptr);
        fprintf(stderr, "Could not create %s.\n", "solution.bmp");
        return 3;
    }

    // read clue_ptr's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, clue_ptr);

    // read clue_ptr's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, clue_ptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(solution_ptr);
        fclose(clue_ptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }

    // write outfile's BITMAPFILEHEADER
    fwrite(&bf, sizeof(BITMAPFILEHEADER), 1, solution_ptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&bi, sizeof(BITMAPINFOHEADER), 1, solution_ptr);

    // determine padding for scanlines
    int padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;

    // iterate over infile's scanlines
    for (int i = 0, biHeight = abs(bi.biHeight); i < biHeight; i++)
    {
        // iterate over pixels in scanline
        for (int j = 0; j < bi.biWidth; j++)
        {
            // temporary storage
            RGBTRIPLE triple;

            // read RGB triple from infile
            fread(&triple, sizeof(RGBTRIPLE), 1, clue_ptr);
            
            if (triple.rgbtRed == 255) {
    triple.rgbtRed = 255;
    triple.rgbtBlue = 255;
    triple.rgbtGreen = 255;
} 

if (triple.rgbtRed < 240 && triple.rgbtRed > 225) {
    triple.rgbtRed = 240;
    triple.rgbtBlue = 240;
    triple.rgbtGreen = 240;
} else if (triple.rgbtRed < 225 && triple.rgbtRed > 200) {
    triple.rgbtRed = 225;
    triple.rgbtBlue = 225;
    triple.rgbtGreen = 225;
} else if (triple.rgbtRed < 200 && triple.rgbtRed > 175) {
    triple.rgbtRed = 125;
    triple.rgbtBlue = 125;
    triple.rgbtGreen = 125;
} else if (triple.rgbtRed <= 175 && triple.rgbtRed > 150) {
    triple.rgbtRed = 60;
    triple.rgbtBlue = 60;
    triple.rgbtGreen = 60;
} else if (triple.rgbtRed <= 150 && triple.rgbtRed > 100) {
    triple.rgbtRed = 50;
    triple.rgbtBlue = 50;
    triple.rgbtGreen = 50;
} else if (triple.rgbtRed <= 150 && triple.rgbtRed > 100) {
    triple.rgbtRed = 25;
    triple.rgbtBlue = 25;
    triple.rgbtGreen = 25;
} else if (triple.rgbtRed <= 100 && triple.rgbtRed > 50) {
    triple.rgbtRed = 15;
    triple.rgbtBlue = 15;
    triple.rgbtGreen = 15;
} else if (triple.rgbtRed <= 50 && triple.rgbtRed > 0) {
    triple.rgbtRed = 0;
    triple.rgbtBlue = 0;
    triple.rgbtGreen = 0;
}

            // write RGB triple to outfile
            fwrite(&triple, sizeof(RGBTRIPLE), 1, solution_ptr);
    

        // skip over padding, if any
        fseek(clue_ptr, padding, SEEK_CUR);

        // then add it back (to demonstrate how)
        for (int k = 0; k < padding; k++)
        {
            fputc(0x00, solution_ptr);
        }
    }
    }

    // close infile
    fclose(clue_ptr);

    // close outfile
    fclose(solution_ptr);

    // that's all folks
    return 0;
}
